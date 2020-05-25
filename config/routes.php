<?php

use Receiv\Controller\Colaboradores\Autenticacao;
use Receiv\Controller\{Home, Dashboard};
use Receiv\Controller\Cliente\ClienteFormularioCadastro;
use Receiv\Controller\Cliente\ClienteListar;
use Receiv\Controller\Cliente\ClienteSalvar;
use Receiv\Controller\Colaboradores\ColaboradorFormularioCadastro;
use Receiv\Controller\Colaboradores\ColaboradorListar;
use Receiv\Controller\Colaboradores\ColaboradorSalvar;
use Receiv\Controller\Titulos\TituloFormularioCadastro;
use Receiv\Controller\Titulos\TituloListar;
use Receiv\Controller\Titulos\TituloSalvar;

return [
  "" => Dashboard::class,
  "/home" => Home::class,
  "/colaboradores/autenticacao" => Autenticacao::class,
  "/colaboradores/cadastro" => ColaboradorFormularioCadastro::class,
  "/colaboradores/salvar-colaborador" => ColaboradorSalvar::class,
  "/colaboradores/listar" => ColaboradorListar::class,
  "/dashboard" => Dashboard::class,
  "/clientes/cadastro" => ClienteFormularioCadastro::class,
  "/clientes/salvar-cliente" => ClienteSalvar::class,
  "/clientes/listar" => ClienteListar::class,
  "/titulos/cadastro" => TituloFormularioCadastro::class,
  "/titulos/salvar-titulo" => TituloSalvar::class,
  "/titulos/listar" => TituloListar::class
];