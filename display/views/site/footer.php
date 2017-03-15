<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<footer>
    <div class="center-align">
        <?$form = ActiveForm::begin(['action' => '/site/footer-action'])?>
            <? if ($activity->isVisiblePrevBtn()):?>
                <button type="submit" class="preg-btn active" name="prev"><span>Назад</span></button>
            <?endif;?>
            <? if ($activity->isVisibleCloseBtn()):?>
                <button type="submit" class="close-btn active" name="close"><span>Закрыть</span></button>
            <?endif;?>
            <button type="submit" class="start-btn" name="start"><span>Старт</span></button>
        <? ActiveForm::end();?>
    </div>
</footer>