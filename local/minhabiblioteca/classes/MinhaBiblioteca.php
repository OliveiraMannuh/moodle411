<?php

namespace local_minhabiblioteca;

define("AUTHENTICATED_URL", 'https://digitallibrary.zbra.com.br/DigitalLibraryIntegrationService/AuthenticatedUrl');
define("CREATE_PRE_REGISTER_USER", 'https://digitallibrary.zbra.com.br/DigitalLibraryIntegrationService/CreatePreRegisterUser');
define("REMOVE_PRE_REGISTER_USER", 'https://digitallibrary.zbra.com.br/DigitalLibraryIntegrationService/RemovePreRegisterUser');

class MinhaBiblioteca
{
    public function __construct()
    {   
        if (self::user_is_blocked()) {
            $this->exception_error('ErroDePermissao - Usuário não autorizado.', "Usuário não autorizado.");
        }
    }

    private function curl_request($service_url, $curl_post_data)
    {
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        $APIKEY = trim(get_config('local_minhabiblioteca', 'apikey'));
        $content_size = strlen($curl_post_data);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Content-Type: application/xml; charset=utf-8",
                "Host: digitallibrary.zbra.com.br",
                "Content-Length: $content_size",
                "Expect: 100-continue",
                "Accept-Encoding: gzip, deflate",
                "Connection: Keep-Alive",
                "X-DigitalLibraryIntegration-API-Key:{$APIKEY}"
            )
        );

        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);

        $curl_response = curl_exec($curl);
        curl_close($curl);

        return new \SimpleXMLElement($curl_response);
    }

    static function user_is_blocked()
    {
        global $USER;
        $prefixes = trim(get_config('local_minhabiblioteca', 'bloquear_acesso'));
        return preg_match("/^({$prefixes})\d*$/i", $USER->username) && $USER->profile["minhabiblioteca"]=="0";
    }

    private function exception_error($type, $message)
    {
        global $CFG;
        throw new \moodle_exception($type,
            'MinhaBiblioteca', 
            $CFG->wwwroot, 
            $message,
            null
        );
    }

    private function get_user_data()
    {
        global $USER;
        $data = new \stdClass();
        $data->name = substr($USER->firstname, 0, 40);
        $data->lastname = substr($USER->lastname, 0, 40);
        $data->username = $USER->username;
        return $data;
    }

    private function xml_body($body, $data)
    {
        return get_string($body, 'local_minhabiblioteca', $data);
    }

    private function autheticate_user() : \SimpleXMLElement
    {
        return $this->curl_request(AUTHENTICATED_URL, $this->xml_body("auth_xml", $this->get_user_data()));
    }

    private function remove_pre_register_user($username) : \SimpleXMLElement
    {
        $remove = $this->curl_request(REMOVE_PRE_REGISTER_USER, $this->xml_body("remove_xml", $username));
        if (($remove->Success == "false")) {
            $this->exception_error('Erro na remoção', $remove->Message);
        }
        return $remove;
    }

    private function create_pre_register_user()
    {
        $register = $this->curl_request(CREATE_PRE_REGISTER_USER, $this->xml_body("create_xml", $this->get_user_data()));
        if (($register->Success == "false")) {
            $this->exception_error('Erro de Cadastro', $register->Message);
        }

        return $this;
    }

    public function createOrAuthenticate()
    {
        $auth = $this->autheticate_user();
        if ($auth->Success == "false") {
            $auth = $this->create_pre_register_user()->autheticate_user();
        }

        return $auth->AuthenticatedUrl;
    }
}
