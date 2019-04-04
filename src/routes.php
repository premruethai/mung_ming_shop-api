<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


$app->get('/showcustomer',function($request,$response,$args){
    $sth = $this->db->prepare('SELECT * FROM customer');
    $sth->execute();
    $customer = $sth->fetchAll();
    return $this->response->withJson($customer);
}); 



$app->get('/customer/name/[{query}]',function($request,$response,$args){
    $sth = $this->db->prepare("SELECT * from customer where name_customer LIKE :q");
    $query = "%".$args['query']."%";
    $sth->bindParam("q",$query);
    $sth->execute();
    $customer = $sth->fetchAll();
    return $this->response->withJson($customer);
});

$app->get('/customer/[{id}]',function($request,$response,$args){
    $sth = $this->db->prepare("SELECT * FROM customer where ID_customer=:id");
    $sth->bindParam("id",$args['id']);
    $sth->execute();
    $customer = $sth->fetchObject();
    return $this->response->withJson($customer);
}); 



