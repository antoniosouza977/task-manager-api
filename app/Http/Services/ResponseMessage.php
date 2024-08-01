<?php

namespace App\Http\Services;

class ResponseMessage
{
    const REGISTRO_NAO_PERTENCE_AO_USUARIO = 'Este registro não pertence ao usuário autenticado.';
    const REGISTRO_NAO_ENCONTRADO = 'Registro não encontrado.';
    const REGISTRO_EXCLUIDO = 'Registro excluido com sucesso.';
}