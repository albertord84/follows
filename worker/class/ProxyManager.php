<?php

namespace follows\cls {
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    require_once 'DB.php';

    /**
     * Description of ProxyManager
     *
     * @author jose
     */
    class ProxyManager {
        //put your code here
        public function UpdateUserProxy()
        {
            $DB = new \follows\cls\DB();
            $clients = $DB->GetClientWithouProxy();
            $proxies = $DB->GetNotResrevedProxyList();
            $proxiesLst = array();
            while(($proxy = $proxies->fetch_object()))
            {
                $proxy->cnt = $DB->GetProxyClientCounts($proxy->proxy)->fetch_object()->cnt;
                array_push($proxiesLst, $proxy);
            }
            while(($client = $clients->fetch_object()))
            {
                $min_proxy = $proxiesLst[0];
                foreach ($proxiesLst as $p)
                {
                    if($p->cnt < $min_proxy->cnt)
                    {
                        $min_proxy = $p;
                    }
                    if($min_proxy->cnt == "0" || $min_proxy->cnt === 0)
                    {
                        break;
                    }
                }
                $res = $DB->SetProxyToClient($client->user_id, $min_proxy->idProxy);
                $min_proxy->cnt++;
            }
        }

        public function GetNextProxy()
        {}

        public  function GetReservedProxy()
        {}
    }
}