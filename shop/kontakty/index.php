<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("banner", {
            center: [55.7057, 37.625802],
            zoom: 15,
			controls: []
        }, {
            searchControlProvider: 'yandex#search'
        }),
    // Создание макета содержимого хинта.
    // Макет создается через фабрику макетов с помощью текстового шаблона.
        HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
            "<b>{{ properties.object }}</b><br />" +
            "{{ properties.address }}" +
            "</div>", {
                // Определяем метод getShape, который
                // будет возвращать размеры макета хинта.
                // Это необходимо для того, чтобы хинт автоматически
                // сдвигал позицию при выходе за пределы карты.
                getShape: function () {
                    var el = this.getElement(),
                        result = null;
                    if (el) {
                        var firstChild = el.firstChild;
                        result = new ymaps.shape.Rectangle(
                            new ymaps.geometry.pixel.Rectangle([
                                [0, 0],
                                [firstChild.offsetWidth, firstChild.offsetHeight]
                            ])
                        );
                    }
                    return result;
                }
            }
        );

    var myPlacemark = new ymaps.Placemark([55.704297, 37.625802], {
        address: "г.Москва, ш. Варшавское, д.1",
        object: 'ООО "Магазин"'
    }, {
        hintLayout: HintLayout
    });

    myMap.geoObjects.add(myPlacemark);
	myMap.behaviors
        // Отключаем часть включенных по умолчанию поведений:
        //  - drag - перемещение карты при нажатой левой кнопки мыши;
        //  - magnifier.rightButton - увеличение области, выделенной правой кнопкой мыши.
        .disable(['drag', 'rightMouseButtonMagnifier', 'scrolzoom']);
}
</script>
<style>
	.my-hint {
		display: inline-block;
		padding: 5px;
		height: 40px;
		position: relative;
		left: -10px;
		width: 195px;
		font-size: 11px;
		line-height: 17px;
		color: #333333;
		text-align: center;
		vertical-align: middle;
		background-color: #faefb6;
		border: 1px solid #CDB7B5;
		border-radius: 20px;
		font-family: Arial;
	}
	#banner header {
		z-index: 1;
	}
</style>

<!-- Banner -->
	<section id="banner">
		<header>
			<h2>Адрес: <em>г.Москва, ш. Варшавское, д.1</em></h2>
			<a href="#footer" class="button">Написать сообщение</a>
		</header>
	</section>

<!-- Posts -->
	<section class="wrapper style1">
		<div class="container">
			<div class="row">
				<section class="6u 12u(narrower)">
					<div class="box post">
						<a href="#" class="image left"><img src="<?=SITE_TEMPLATE_PATH?>/images/pic01.jpg" alt="" /></a>
						<div class="inner">
							<h3>Контакты</h3>
							<p>777777, г.Москва, ш. Каширское, д.1<br/>
							8(800)112-22-35<br/>
							<a href="mailto:good_man5@mail.ru">good_man5@mail.ru</a>
							</p>
							<p>Работаем круглосуточно</p>
						</div>
					</div>
				</section>
				<section class="6u 12u(narrower)">
					<div class="box post">
						<a href="#" class="image left"><img src="<?=SITE_TEMPLATE_PATH?>/images/pic02.jpg" alt="" /></a>
						<div class="inner">
							<h3>ООО &laquo;Магазин&raquo</h3>
							<p>
							ИНН 87878987<br/>
							КПП 87878987<br/>
							БИК 87878987<br/>
							ОКПО 87878987<br/>
							ОКАТО 87878987
							</p>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>