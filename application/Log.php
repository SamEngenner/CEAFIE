<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace application;
/**
 *
 * @author sam
 */
interface Log {

    //put your code here

    public function verificarArquivo();

    public function gravar($mensagem);
    
   
}
