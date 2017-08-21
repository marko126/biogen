<?php
namespace app\components;
 
use yii\base\Component;

class Settings extends Component {

    public $categories;
    
    public function init() {        
        $this->categories = [
            1 => [
                'title' => 'Hvad er<br>Multipel<br>Sclerose',
                'subcategories' => [
                    1 => 'Multipel Sclerose Er en nervesygdom',
                    2 => 'Nedbrydning af myelin & nerveceller',
                    3 => 'Hvordan får man en autoimmun sygdom',
                    4 => 'Langsom hjernebetændelse',
                    5 => 'Hvad er<br> plak',
                    6 => 'Genkend<br> et attak'
                ]
            ],
            2 => [
                'title' => 'årsager til<br>Multipel<br>Sclerose',
                'subcategories' => [
                    1 => 'årsagen til sclerose er ukendt',
                    2 => 'risiko hos<br> slægtninge',
                    3 => 'ikke ét<br> ms gen',
                    4 => 'kendte <br>miljøfaktorer'
                ]
            ],
            3 => [
                'title' => 'Hvordan<br>rammer<br>MS',
                'subcategories' => [
                    1 => 'forekomst <br>af ms i danmark',
                    2 => 'hvem rammer <br>multipel sclerose',
                    3 => 'øget risiko <br>blandt kvinder',
                    4 => 'geografisk <br>udbredning i verden',
                    5 => 'miljøfaktorer & <br>immigrationsstudier'
                ]
            ],
            4 => [
                'title' => ' Hvordan <br>stilles <br>diagnosen',
                'subcategories' => [
                    1 => 'diagnose/ <br>UDREDNING',
                    2 => 'sygehistorie & <br><span>Neurologisk undersøgelse<span>',
                    3 => 'MR <br>Scanning',
                    4 => 'MR billeder <br>med plak',
                    5 => 'kontrastopladning <br>i plak',
                    6 => 'Undersøgelse <br>af rygmarvsvæske',
                    7 => 'Neurofysiologisk <br>undersøgelse',
                    8 => 'MS debut-<br>symptomer'
                ]
            ],
            5 => [
                'title' => 'Multipel<br>Sclerose<br>forløb',
                'subcategories' => [
                    1 => 'forløb af sclerose <br>uden behandling',
                    2 => 'former for <br>MULTIPEL SCLEROSE',
                    3 => 'fra attakvis til <br>sekundær progressiv'
                ]
            ],
            6 => [
                'title' => 'Behandling<br> af Multipel<br> Sclerose',
                'subcategories' => [
                    1 => 'rehabilitering<br> ',
                    2 => 'Sygdomsdæmpende <br>behandling',
                    3 => 'symptom <br>behandling',
                    4 => 'Sclerose-<br>smerter',
                    5 => 'Spasticitet <br>VED MS',
                    6 => 'Fatigue eller <br>sclerosetræthed',
                    7 => 'Fatigue eller <br>sclerosetræthed',
                    8 => 'årsager til <br>sclerosetræthed',
                    9 => 'årsager til <br>sclerosetræthed',
                    10 => 'behandling af <br>sclerosetræthed',
                    11 => 'vandladnings-<br>gener',
                    12 => 'vandladnings-<br>gener',
                    13 => 'tarm <br>dysfunktion',
                    14 => 'faktorer der giver <br>forstoppelse',
                    15 => 'faktorer der giver <br>Inkontinens',
                    16 => 'SEKSUEL <br>DYSFUNKTION',
                    17 => 'SEKSUEL <br>DYSFUNKTION'
                ]
            ],
            7 => [
                'title' => 'symptomer<br>PÅ Multipel<br>Sclerose',
                'subcategories' => [
                    1 => 'symptomer ved <br>MS',
                    2 => 'symptomforværring - <br>Pseudo attak'
                ]
            ],
            8 => [
                'title' => 'HVAD KAN<br>JEG SELV<br>GØRE',
                'subcategories' => [
                    1 => 'VÆLG DEN MOTION DER <br>PASSER BEDST TIL DIG',
                    2 => 'FØLG DE 10 <br>KOSTRÅD'
                ]
            ],
        ];
    }
}
