<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Coches;

// Seeder de datos iniciales: 5 categorías y 75 coches con imágenes de Google
class CochesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 5 categorías de vehículos
        $deportivo = Categoria::create(['nombre' => 'Deportivo']);
        $todoterreno = Categoria::create(['nombre' => 'Todoterreno']);
        $descapotable = Categoria::create(['nombre' => 'Descapotable']);
        $familiar = Categoria::create(['nombre' => 'Familiar']);
        $urbano = Categoria::create(['nombre' => 'Urbano']);
        $kart = Categoria::create(['nombre' => 'Kart']);

        // Base de datos de 75 coches (15 por categoría)
        $coches = [
            // Coches Superdeportivos
            "Bugatti Chiron" => [
                'marca' => 'Bugatti',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/a/ab/Bugatti_Chiron_IMG_0087.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Bugatti_Chiron'
            ],
            "Lamborghini Aventador" => [
                'marca' => 'Lamborghini',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/1/19/Lamborghini_Aventador.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Lamborghini_Aventador'
            ],
            "Porsche 911 GT3" => [
                'marca' => 'Porsche',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://i.ytimg.com/vi/prbJIZ83bdo/maxresdefault.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Porsche_911_GT3'
            ],
            "Ferrari 488 GTB" => [
                'marca' => 'Ferrari',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/0/06/Ferrari_488_GTB_IMG_4120.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Ferrari_488_GTB'
            ],
            "McLaren 720S" => [
                'marca' => 'McLaren',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/a/af/Mclaren_720S_PA280973-PSD.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/McLaren_720S'
            ],
            "Audi R8" => [
                'marca' => 'Audi',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/VzM4p7/s1/audi-r8-japan-final-edition.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Audi_R8'
            ],
            "Chevrolet Corvette Z06" => [
                'marca' => 'Chevrolet',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/NrqLy/s3/2023-chevrolet-corvette-z06-exterior-design.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Chevrolet_Corvette_Z06'
            ],
            "Nissan GT-R" => [
                'marca' => 'Nissan',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://tekniikanmaailma.fi/wp-content/uploads/2021/08/0809-nissan-gt-r-nismo-1.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Nissan_GT-R'
            ],
            "Ford Mustang Shelby GT500" => [
                'marca' => 'Ford',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/bprYr/s3/ford-mustang-shelby-gt500se-shelby-america-signature-edition.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Ford_Mustang_Shelby_GT500'
            ],
            "Jaguar F-Type SVR" => [
                'marca' => 'Jaguar',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://www.motoryracing.com/images/noticias/portada/17000/17790-n.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Jaguar_F-Type_SVR'
            ],
            "Aston Martin Vantage" => [
                'marca' => 'Aston Martin',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/b/b1/2020_Aston_Martin_Vantage_V8_%28With_New_Optional_Grille%29.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Aston_Martin_Vantage'
            ],
            "Mercedes-AMG GT" => [
                'marca' => 'Mercedes-Benz',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/1/10/Mercedes-AMG_GT_C_Roadster_%2851287350204%29.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Mercedes-AMG_GT'
            ],
            "BMW M4 GTS" => [
                'marca' => 'BMW',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://a.ccdn.es/cnet/contents/media/bmw/serie_4/1121911.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/BMW_M4_GTS'
            ],
            "Koenigsegg Agera RS" => [
                'marca' => 'Koenigsegg',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://www.topgear.com/sites/default/files/images/news-article/2018/08/7ad82de49b82e424ae87da3c13a69e76/03_dsc1703-1-oskar-bakke.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Koenigsegg_Agera_RS'
            ],
            "Pagani Huayra" => [
                'marca' => 'Pagani',
                'categoria_id' => $deportivo->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Pagani_Huayra_BC_.jpg/1200px-Pagani_Huayra_BC_.jpg',
                'url_imdb' => 'https://es.wikipedia.org/wiki/Pagani_Huayra'
            ],

            // Coches Todoterrenos
            "Jeep Wrangler" => [
                'marca' => 'Jeep',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://www.jeep.es/content/dam/jeep/crossmarket/model/wrangler/limited-edition/wrangler-night-eagle-limited-edition.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt6677889/'
            ],
            "Land Rover Defender" => [
                'marca' => 'Land Rover',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://dealerinspire-image-library-prod.s3.us-east-1.amazonaws.com/images/uVSO01xfRTjurbYWLEjDGrrgeEdOYqmirsFxITKz.png',
                'url_imdb' => 'https://www.imdb.com/title/tt7788990/'
            ],
            "Toyota Land Cruiser" => [
                'marca' => 'Toyota',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://images.pexels.com/photos/18029607/pexels-photo-18029607.jpeg?cs=srgb&dl=pexels-safi-erneste-165511538-18029607.jpg&fm=jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt8899001/'
            ],
            "Ford Bronco" => [
                'marca' => 'Ford',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://www.ford.es/content/dam/guxeu/rhd/central/cars/2022-bronco-suv/pre-launch/video/ford-bronco-eu-Badlands_Bronco_16_9-16x9-2160x1215.jpg.renditions.original.png',
                'url_imdb' => 'https://www.imdb.com/title/tt9900112/'
            ],
            "GMC Yukon" => [
                'marca' => 'GMC',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/2015_GMC_Yukon_XL_SLT%2C_front_2.29.20.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1213144/'
            ],
            "Nissan Armada" => [
                'marca' => 'Nissan',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/Np2NG/s3/2021-nissan-rogue.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1314155/'
            ],
            "Honda Pilot" => [
                'marca' => 'Honda',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/2023_Honda_Pilot_Touring_in_Radiant_Red%2C_front_left.jpg/2560px-2023_Honda_Pilot_Touring_in_Radiant_Red%2C_front_left.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1415166/'
            ],
            "Subaru Outback" => [
                'marca' => 'Subaru',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/8e7xP/s1/2022-subaru-outback-wilderness-edition.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1516177/'
            ],
            "Mazda CX-9" => [
                'marca' => 'Mazda',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://static.motor.es/fotos-noticias/2020/08/mazda-cx-9-2021-202070168-1597822860_1.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1617188/'
            ],
            "Kia Telluride" => [
                'marca' => 'Kia',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/zM094/s1/2020-kia-telluride.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1718199/'
            ],
            "Hyundai Palisade" => [
                'marca' => 'Hyundai',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://static.motor.es/fotos-noticias/2022/04/hyundai-palisade-2023-202286321-1649946580_1.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1819200/'
            ],
            "Volkswagen Touareg" => [
                'marca' => 'Volkswagen',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://vw-wp-multisite.s3.eu-west-1.amazonaws.com/wp-content/uploads/sites/4/2010/02/03183838/touareg_historicos_sala_actual.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1920211/'
            ],
            "Audi Q7" => [
                'marca' => 'Audi',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://www.evoindia.com/h-upload/uid/O3DUnjLhu7L46dD3v4GmvseNySuSzq4q.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2021222/'
            ],
            "BMW X5" => [
                'marca' => 'BMW',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://mediapool.bmwgroup.com/cache/P9/202302/P90495526/P90495526-the-new-bmw-x5-m-competition-exterior-02-2023-600px.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2122233/'
            ],
            "Mercedes-Benz G-Class" => [
                'marca' => 'Mercedes-Benz',
                'categoria_id' => $todoterreno->id,
                'imagen' => 'https://grupocadimar.com/wp-content/uploads/2023/01/g-prin.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2223244/'
            ],

            // Coches Descapotables
            "Mazda MX-5 Miata" => [
                'marca' => 'Mazda',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://live.staticflickr.com/4871/45867643872_93d009ebdc_o.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2233444/'
            ],
            "BMW Z4" => [
                'marca' => 'BMW',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://mediapool.bmwgroup.com/cache/P9/202209/P90479445/P90479445-bmw-z4-m40i-09-2022-2250px.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3344555/'
            ],
            "Audi A5 Cabriolet" => [
                'marca' => 'Audi',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/lE2LqW/s1/audi-a5-cabriolet-competition-edition-plus-2022.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4455666/'
            ],
            "Mercedes-Benz C-Class Cabriolet" => [
                'marca' => 'Mercedes-Benz',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://s3.abcstatics.com/media/motor/2019/01/12/cabrio-mercedes-ku1B--1248x698@abc.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt5566777/'
            ],
            "Ford Mustang Convertible" => [
                'marca' => 'Ford',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://images.turo.com/media/vehicle/images/YOltNGVXToWTW57KnjZQBw.480x235.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt6677888/'
            ],
            "Chevrolet Camaro Convertible" => [
                'marca' => 'Chevrolet',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Chevrolet_Camaro_Convertible_%28front_quarter%29.jpg/1280px-Chevrolet_Camaro_Convertible_%28front_quarter%29.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt7788999/'
            ],
            "Porsche 718 Boxster" => [
                'marca' => 'Porsche',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://imagenes.autobild.es/files/image_640_360/uploads/imagenes/2023/10/03/68ca616d77c11.jpeg',
                'url_imdb' => 'https://www.imdb.com/title/tt8899000/'
            ],
            "Jaguar F-Type Convertible" => [
                'marca' => 'Jaguar',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://www.km77.com/images/medium/9/2/8/1/jaguar-f-type-frontal-lateral.329281.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt9900111/'
            ],
            "Mini Cooper Convertible" => [
                'marca' => 'Mini',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://www.km77.com/images/medium/6/2/1/9/mini-cooper-cabrio-2025-frontal-lateral.376219.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1011121/'
            ],
            "Volkswagen Beetle Convertible" => [
                'marca' => 'Volkswagen',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://vw-wp-multisite.s3.eu-west-1.amazonaws.com/wp-content/uploads/sites/4/2012/12/03183904/Beetle_Cabrio.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1213142/'
            ],
            "Fiat 124 Spider" => [
                'marca' => 'Fiat',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Fiat_124_Spider_%2815628978601%29.jpg/2560px-Fiat_124_Spider_%2815628978601%29.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1314154/'
            ],
            "Alfa Romeo 4C Spider" => [
                'marca' => 'Alfa Romeo',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://soymotor.com/sites/default/files/imagenes/noticia/alfa_romeo_4c_spider_italia.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1415165/'
            ],
            "Chevrolet Corvette Convertible" => [
                'marca' => 'Chevrolet',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/%2772_Chevrolet_Corvette_Stingray_Convertible_%28Orange_Julep%29.JPG/1280px-%2772_Chevrolet_Corvette_Stingray_Convertible_%28Orange_Julep%29.JPG',
                'url_imdb' => 'https://www.imdb.com/title/tt1516176/'
            ],
            "Lexus LC 500 Convertible" => [
                'marca' => 'Lexus',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://www.km77.com/media/fotos/lexus_lc_2017_descapotable_7386_4.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1617187/'
            ],
            "Jaguar XK Convertible" => [
                'marca' => 'Jaguar',
                'categoria_id' => $descapotable->id,
                'imagen' => 'https://noticias.pro.pvt.coches.com/wp-content/uploads/2014/07/jaguar_xk-convertible-2009_r6.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1718198/'
            ],

            // Coches Familiares
            "Volvo V90" => [
                'marca' => 'Volvo',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://cdn-images.motor.es/image/m/1320w/fotos-noticias/2016/06/presentacion-volvo-v90-201628710_1.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1820219/'
            ],
            "Volvo V60" => [
                'marca' => 'Volvo',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://ddaudio.es/assets/galleries/47898/594/4343xc-webp.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt1921220/'
            ],
            "Audi A6 Avant" => [
                'marca' => 'Audi',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://cdn-datak.motork.net/configurator-imgs/cars/es/800/AUDI/A6/49301_WAGON-5-DOORS/audi-a6-avant-front-view.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2022231/'
            ],
            "BMW 5 Series Touring" => [
                'marca' => 'BMW',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://mediapool.bmwgroup.com/cache/P9/201612/P90245026/P90245026-the-new-bmw-5-series-touring-bmw-530d-xdrive-touring-02-2017-600px.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2123242/'
            ],
            "Mercedes-Benz E-Class Estate" => [
                'marca' => 'Mercedes-Benz',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://www.km77.com/images/medium/2/3/3/1/mercedes-clase-e-estate-lateral-frontal.332331.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2224253/'
            ],
            "Volkswagen Passat Variant" => [
                'marca' => 'Volkswagen',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://www.km77.com/media/fotos/volkswagen_passat_2019_variant_7064_1.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2325264/'
            ],
            "Skoda Superb Combi" => [
                'marca' => 'Skoda',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://cdn.motor1.com/images/mgl/bgz6Xm/s1/2023-skoda-superb-combi-rendering.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2426275/'
            ],
            "Ford Mondeo Estate" => [
                'marca' => 'Ford',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://www.topgear.com/sites/default/files/cars-car/image/2015/03/mondeo_front.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2527286/'
            ],
            "Peugeot 508 SW" => [
                'marca' => 'Peugeot',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://stellantis3.dam-broadcast.com/medias/domain12808/media101285/385774-gbod13fyig-xlarge.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2628297/'
            ],
            "Renault Talisman Estate" => [
                'marca' => 'Renault',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://ddaudio.es/assets/galleries/73764/594/012afftq.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2729308/'
            ],
            "Toyota Avensis Touring Sports" => [
                'marca' => 'Toyota',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://www.km77.com/images/medium/2/5/6/3/toyota-avensis-touring-sports-2016-150d-executive-frontal-lateral.322563.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2830319/'
            ],
            "Citroën C5 Aircross" => [
                'marca' => 'Citroën',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://images.prismic.io/carwow/aNwJUp5xUNkB1Sso_2025-LHD-Citroen-C5-Aircross-front-quarter-moving.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt2931320/'
            ],
            "Honda Accord Tourer" => [
                'marca' => 'Honda',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://www.km77.com/media/fotos/honda_accord_2006_tourer_2086_1.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3032331/'
            ],
            "Mazda 6 Wagon" => [
                'marca' => 'Mazda',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://www.autopista.es/uploads/s1/57/70/52/6/article-mazda-6-wagon-2018-datos-fotos-salon-ginebra-5a7ad44cab8f4.jpeg',
                'url_imdb' => 'https://www.imdb.com/title/tt3133342/'
            ],
            "Kia Optima Sportswagon" => [
                'marca' => 'Kia',
                'categoria_id' => $familiar->id,
                'imagen' => 'https://www.km77.com/images/medium/8/7/6/7/kia-optima-sportswagon-frontal-lateral.328767.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3234353/'
            ],

            // Coches Urbanos
            "Fiat 500" => [
                'marca' => 'Fiat',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://www.media.stellantis.com/cache/a/e/f/f/6/aeff64ddb30de8241b6237228e64eb2722de909b.jpeg',
                'url_imdb' => 'https://www.imdb.com/title/tt3335364/'
            ],
            "Mini Cooper" => [
                'marca' => 'Mini',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://www.km77.com/images/medium/2/7/2/9/mini-cooper-s-5-puertas-2024-frontal-lateral.372729.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3436375/'
            ],
            "Volkswagen Up!" => [
                'marca' => 'Volkswagen',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Volkswagen_up%21_Black_%28front_quarter%29.jpg/330px-Volkswagen_up%21_Black_%28front_quarter%29.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3537386/'
            ],
            "Toyota Aygo" => [
                'marca' => 'Toyota',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://www.km77.com/images/medium/9/3/2/1/toyota-aygo-estatica.319321.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3638397/'
            ],
            "Hyundai i10" => [
                'marca' => 'Hyundai',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://grupoditram.com/wp-content/uploads/2023/03/i10-prin.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3739408/'
            ],
            "Kia Picanto" => [
                'marca' => 'Kia',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://www.kia.com/content/dam/kwcms/kme/global/en/assets/vehicles/ja/picanto-my25/discover/kia-picanto-gtl-my25-sea.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3840419/'
            ],
            "Renault Twingo" => [
                'marca' => 'Renault',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://carnovo.com/wp-content/uploads/2019/01/renault-twingo-2019.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt3941420/'
            ],
            "Citroën C1" => [
                'marca' => 'Citroën',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://www.shutterstock.com/image-photo/stony-stratfordbucksuk-november-8th-2022-600nw-2223913339.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4042431/'
            ],
            "Peugeot 108" => [
                'marca' => 'Peugeot',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/17-08-05-Island-Auto-RalfR-DSC_2520.jpg/1200px-17-08-05-Island-Auto-RalfR-DSC_2520.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4143442/'
            ],
            "Smart ForTwo" => [
                'marca' => 'Smart',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://images.ctfassets.net/uaddx06iwzdz/460MdTOUw99wVRLsoYvFB2/98b9ae2fb473d2a8106cee402b12b389/smart-l.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4244453/'
            ],
            "Seat Mii" => [
                'marca' => 'Seat',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://www.cochesyconcesionarios.com/uploads/seat/mii/1/ha/seat-mii-electric-01-dfa28cf0f685dad3b9139e71f7b88b191f83c57e.jpeg',
                'url_imdb' => 'https://www.imdb.com/title/tt4345464/'
            ],
            "Opel Adam" => [
                'marca' => 'Opel',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://www.km77.com/revista/wp-content/uploads/2016/11/Opel-ADAM-S_02.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4446475/'
            ],
            "Honda Jazz" => [
                'marca' => 'Honda',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://static.motor.es/fotos-jato/honda/uploads/honda-jazz-65be81ae635b2.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4547486/'
            ],
            "Nissan Micra" => [
                'marca' => 'Nissan',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://image.cardesignnews.com/441946.webp?imageId=441946&width=1200&height=676&format=jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4648497/'
            ],
            "Chevrolet Spark" => [
                'marca' => 'Chevrolet',
                'categoria_id' => $urbano->id,
                'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/8/8c/2010_Chevy_Spark_LS_%284359987176%29.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4749508/'
            ],

            // Karts
            "Birel ART N35" => [
                'marca' => 'Birel ART',
                'categoria_id' => $kart->id,
                'imagen' => 'https://www.birelart.com/public/news/snap_birelART(147).jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4840519/'
            ],
            "Tony Kart Racer 401R" => [
                'marca' => 'Tony Kart',
                'categoria_id' => $kart->id,
                'imagen' => 'https://tkart.it/uploads/2022/04/ss-ur-401rr-rr-30.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt4941520/'
            ],
            "CRG Road Rebel" => [
                'marca' => 'CRG',
                'categoria_id' => $kart->id,
                'imagen' => 'https://www.racing-motor.dk/wp-content/uploads/2023/02/CRG-ROAD-REBEL.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt5042531/'
            ],
            "Sodi RT8" => [
                'marca' => 'Sodi',
                'categoria_id' => $kart->id,
                'imagen' => 'https://media-cdn.tripadvisor.com/media/photo-s/19/ed/fc/ae/new-sodi-rt8-go-karts.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt5143542/'
            ],
            "Praga R1" => [
                'marca' => 'Praga',
                'categoria_id' => $kart->id,
                'imagen' => 'https://pragaglobal.com/wp-content/uploads/2023/12/Jimmy-Broadbent-Time-Attack-Praga-R1-credit-Keith-Lamb_01.jpg',
                'url_imdb' => 'https://www.imdb.com/title/tt5244553/'
            ]
        ];

        foreach ($coches as $modelo => $coche) {
            $coche['modelo'] = $modelo;
            Coches::create($coche);
        }

    }
}

