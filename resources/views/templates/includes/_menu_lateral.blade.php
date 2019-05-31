<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">

            <li data-toggle="collapse" data-target="#bancos" id="menu_div_banco" class="collapsed active">
                <a><i class="fa fa-bank fa-lg"></i> Bancos <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="bancos">
                <li class="active"><a href="{{ route('banco.novo') }}">Novo Banco</a></li>
                <li><a href="#">Alterar Banco</a></li>
                <li><a href="{{ route('bancos') }}">Todos Bancos</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#contas" class="collapsed">
                <a><i class="fa fa-money fa-lg"></i> Contas <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="contas">
                <li class="active"><a href="">Nova Conta</a></li>
                <li><a href="#">Alterar Conta</a></li>
                <li><a href="">Trocar de Conta</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#products" id="menu_div_extrato" class="collapsed disabled">
                <a href="#"><i class="fa fa-newspaper-o fa-lg"></i> Extratos <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li class="active"><a href="">Mês Atual</a></li>
                <li><a href="">Por Período</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#service" id="menu_div_trasacoes" class="collapsed disabled">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Transações <span class="arrow"></span></a>
            </li>  
            <ul class="sub-menu collapse" id="service">
                <li><a href="">Creditar</a></li>
                <li><a href="">Debitar</a></li>
            </ul>

            <li data-toggle="collapse" data-target="#new" id="menu_div_cartao_credito" class="collapsed disabled">
                <a href="#"><i class="fa fa-credit-card fa-lg"></i> Cartão de Crédito <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li><a href="">Nova Bandeira</a></li>
                <li><a href="">Novo Cartão</a></li>
                <li>Alterar Cartão</li>
                <li><a href="">Lançar Compra</a></li>
                <li><a href="">Gerar Fatura</a></li>
                <li><a href="">Pagar Fatura</a></li>
                <li>Consultar Fatura</li>
            </ul>

            <li data-toggle="collapse" data-target="#agendamentos" id="menu_div_agendamentos" class="collapsed disabled">
                <a href="#"><i class="fa fa-calendar fa-lg"></i> Agendamentos <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="agendamentos">
                <li><a href="">Agendar Pagamento</a></li>
                <li>Listagem Pagamentos</li>
            </ul>

            <li id="menu_div_dashboards" class="disabled">
                <a href="#">
                <i class="fa fa-dashboard fa-lg"></i> Relatórios
                </a>
            </li>

            <li>
                <a href="#">
                <i class="fa fa-user fa-lg"></i> Perfil
                </a>
            </li>

            <li>
                <a href="#">
                <i class="fa fa-users fa-lg"></i> Dados do Usuário
                </a>
            </li>
        </ul>
    </div>
</div>

    <style>

    </style>