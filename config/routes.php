<?php

use Receiv\Controller\Colaboradores\Autenticacao;
use Receiv\Controller\{Charts, Home, Dashboard};
use Receiv\Controller\Cliente\ClienteFormularioCadastro;
use Receiv\Controller\Cliente\ClienteListar;
use Receiv\Controller\Cliente\ClienteRemover;
use Receiv\Controller\Cliente\ClienteSalvar;
use Receiv\Controller\Colaboradores\ColaboradorFormularioCadastro;
use Receiv\Controller\Colaboradores\ColaboradorListar;
use Receiv\Controller\Colaboradores\ColaboradorRemover;
use Receiv\Controller\Colaboradores\ColaboradorSalvar;
use Receiv\Controller\Titulos\TituloFormularioCadastro;
use Receiv\Controller\Titulos\TituloListar;
use Receiv\Controller\Titulos\TituloRemover;
use Receiv\Controller\Titulos\TituloSalvar;

return [
  "" => Dashboard::class,
  "/home" => Home::class,
  "/colaboradores/autenticacao" => Autenticacao::class,
  "/colaboradores/cadastro" => ColaboradorFormularioCadastro::class,
  "/colaboradores/salvar-colaborador" => ColaboradorSalvar::class,
  "/colaboradores/listar" => ColaboradorListar::class,
  "/colaboradores/remover" => ColaboradorRemover::class,
  "/dashboard" => Dashboard::class,
  "/dashboard/charts" => Charts::class,
  "/clientes/cadastro" => ClienteFormularioCadastro::class,
  "/clientes/salvar-cliente" => ClienteSalvar::class,
  "/clientes/listar" => ClienteListar::class,
  "/clientes/remover" => ClienteRemover::class,
  "/titulos/cadastro" => TituloFormularioCadastro::class,
  "/titulos/salvar-titulo" => TituloSalvar::class,
  "/titulos/listar" => TituloListar::class,
  "/titulos/remover" => TituloRemover::class
];