<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->registerJsFile("/js/step6.js");
?>
<section id="step-quantity-fuel" class="active-step" style="margin-bottom: 50px;">
    <div class="wapper">
        <div class="center-content">
            <div class="left-block">
                <div class="success-action">Данные карты</div>
                <div><?=$activity->card["partner"]["name"]?></div>
                <div>№<?=$activity->card["id_txt"]?></div>
                <div><?=$activity->card["name"]?></div>
                <div>Доступный объем: <?=$activity->maxVolume?>, л</div>
                <div>Вид топлива: <?=$activity->address->product->name?></div>
                <br/>
                <br/>
                <br/>
                <div class="success-action" style="color: red;">Пожалуйста, введите объем заправки</div>
            </div>
            <div class="right-block">
                <?$form = ActiveForm::begin(['action' => '/site/footer-action', 'id' => 'volumePanel'])?>
                <div class="quantity">
                    <input type="text" name="quantity_fuel" required placeholder="0" pattern="\d+" size="4"
                           maxlength="4" disabled id="dvolume">
                </div>
                <div class="keyboard">
                    <input type="button" class="num" value="7">
                    <input type="button" class="num" value="8">
                    <input type="button" class="num" value="9">
                    <input type="button" class="num" value="4">
                    <input type="button" class="num" value="5">
                    <input type="button" class="num" value="6">
                    <input type="button" class="num" value="1">
                    <input type="button" class="num" value="2">
                    <input type="button" class="num" value="3">
                    <input type="button" class="num  btn-grey" value="0">
                    <input type="button" class="del" value="Удалить">
                </div>
                <input name="fuel_volume" type="hidden" id="svolume">
                <? ActiveForm::end();?>
            </div>
        </div>
    </div>
    <input type="hidden" id="maxVolume" value="<?=$activity->maxVolume?>">
</section>

<?=$this->render('footer', ['activity' => $activity])?>