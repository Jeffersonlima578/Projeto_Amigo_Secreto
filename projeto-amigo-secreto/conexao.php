<?php
//acesso ao banco de forma segura
try{
    //fazendo conexão ao banco com pdo 
    $pdo = new PDO('mysql:host=localhost;dbname=modulo_8', 'root', '');
    //para mostrar erros do banco
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //capturando o erro de não acesso ao banco de dados
    }catch(Exception $e){
        print $e->getMessage();
        print "Não foi possivel conectar tente mais tarde";
    }
    
    