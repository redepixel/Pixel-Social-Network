<?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession'])) and (isset($_COOKIE['thecry']))){
    $iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
    $thecry = DBEscape( strip_tags( trim( $_COOKIE['thecry'] ) ) );
    $user   = DBRead( 'user', "WHERE id = '{$iduser}' and thecry  = '{$thecry}'  LIMIT 1" );
    if (!$user){
    setcookie("iduser" , "");
    setcookie("inisession" , "");
    setcookie("thecry" , "");
    header("location: /");
    }
    else{
    $user = $user[0];
    $idcry = DBEscape( strip_tags(trim($_COOKIE['thecry']) ) );
    $usercry = DBRead('user', "WHERE thecry = '{$idcry}' LIMIT 1 ");
    $usercry = $usercry[0];
?>

<!-- <div class="header uk-animation-slide-top-small">
    <div class="uk-flex uk-flex-center">
    <div class="header-align">

        <a href="/" id="logos"><img class="logo-div" src="/img/logo/2.png"></a>
    </div>
    </div>
    <div class="uk-flex uk-flex-left">
        <div class="tabs">
        <div class="uk-flex uk-flex-center">
        <div class="header-align">

        <a href="/" uk-tooltip="Voltar ao começo"><span uk-icon="home"></span>Ínicio</a>
        <a uk-tooltip="Meus desenhos Favoritos"><span uk-icon="heart"></span>Favoritos</a>
        <a href="/profile.php?id=<?php echo $user['id'];?>" uk-tooltip="Meu perfil"><span uk-icon="user"></span>Perfil</a>
        <a uk-tooltip="Publicar uma postagem" href="#publish" uk-toggle><span uk-icon="plus"></span>Nova Postagem</a>
        <a><span uk-icon="bell" uk-tooltip="Notificações"></span> <span id="news">1</span></a>
        </div>

        </div>


        </div>

    </div>
</div> -->


<div id="header">
 <div class="uk-flex uk-flex-center">
    <div class="header-align">
        <form class="uk-search uk-search-default" style="position: absolute;">
        <div class="serch">
        <span uk-search-icon style="position: absolute; top: 20px; z-index: 40;"></span>
        <input class="uk-search-input" type="search" value="<?php if(isset($_GET['id'])){ echo $people['nome']; echo ' '; echo $people['sobrenome'];}?>" placeholder="Pesquisar..." style="position: absolute; background: #ffecd9;">
        </div>
        </form>
        <center>
        <a href="/" id="logos">Pixel</a>
        </center>
        <div class="uk-flex uk-flex-right">
            <a href="/logout"  uk-tooltip="Sair da conta" id="sair">Sair <span uk-icon="sign-out"></a>
        </div>
    </div>
    </div>
</div>

<?php } }?>