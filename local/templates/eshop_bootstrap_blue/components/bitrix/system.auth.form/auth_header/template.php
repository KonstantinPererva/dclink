<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<div class="bx-profile-link-wrapper">

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<?if($arResult["FORM_TYPE"] == "login"):?>
<div class="bx-profile-link__button">
	<a href="/auth/" rel="nofollow" class="bx-profile-link bx-profile-link_white"><?=GetMessage("AUTH_LOGIN_BUTTON")?></a>
	
<?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
	<span class="bx-profile-link-separator">/</span>
	<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow" class="bx-profile-link bx-profile-link_green"><?=GetMessage("AUTH_REGISTER")?></a>
<?endif?>
</div>

<?
else:
?>
<div class="bx-profile-link__button">
	<a href="<?=$arResult["PROFILE_URL"]?>" class="bx-profile-link bx-profile-link_white"><?=$arResult["USER_LOGIN"]?></a>
	<span class="bx-profile-link-separator">/</span>
	<a href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array(
	"login",
	"logout",
	"register",
	"forgot_password",
	"change_password"));?>" class="bx-profile-link bx-profile-link_green"><?=GetMessage("AUTH_LOGOUT_BUTTON")?></a>
</div>
<?endif?>

</div>