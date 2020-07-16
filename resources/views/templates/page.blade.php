<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <link rel="stylesheet" href="{{url('css/principal.css')}}">"
    <title>Cadastro de Pessoas</title>
</head>

<body>

    <div id="conteudoGeral">

        <div id="topoGeral">
            <div id="logoTopo" onclick="location.href=''" style="cursor:pointer;"></div>
            <div id="dirTopo"></div>
        </div>

        <div id="baixoGeral">

            <div id="menuEsq">
                <div id="titMenu">Menu de Opções</div>
                <a href="{{ url('/') }}">Início</a>
                <a href="{{ url('pessoa') }}">Incluir Novo</a>
                <a href="{{ url('pessoas') }}">Listar Cadastros</a>
            </div>
            <div id="conteudoDir">
                @yield('content')
            </div>
        </div>
</body>
</html>