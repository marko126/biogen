<?php
namespace app\components;
 
use yii\base\Component;
use Yii;

class Settings extends Component {

    public $categories;
    
    public $slides = [];
    
    public function init() {
        $user = Yii::$app->user->identity;
        $this->categories = [
            0 => [
                'title' => '<div>'. strtoupper($user->getFirstName()) .'</div><div>'. strtoupper($user->getLastName()) .'</div><span>'. strtoupper($user->getHospitalName()) .'</span>',
                'subcategories' => [
                    1 => 'DANSK MULTIPEL <br>SCLEROSE Center'
                ]
            ],
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
                'title' => 'Årsager til<br>Multipel<br>Sclerose',
                'subcategories' => [
                    1 => 'Årsagen til sclerose er ukendt',
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
                'title' => 'Multipel<br>Sclerose<br>forlØb',
                'subcategories' => [
                    1 => 'forløb af sclerose <br>uden behandling',
                    2 => 'former for <br>MULTIPEL SCLEROSE',
                    3 => 'fra attakvis til <br>sekundær progressiv'
                ]
            ],
            6 => [
                'title' => 'Behandling<br> af Multipel<br> Sclerose',
                'subcategories' => [
                    1 => 'rehabilitering<br>     ',
                    2 => 'Sygdomsdæmpende <br>behandling',
                    3 => 'symptom <br>behandling',
                    4 => 'Sclerose-<br>smerter',
                    5 => 'Spasticitet <br>VED MS',
                    6 => 'Fatigue eller <br>sclerosetræthed',
                    7 => 'Fatigue eller <br>sclerosetræthed',
                    8 => 'Årsager til <br>sclerosetræthed',
                    9 => 'Årsager til <br>sclerosetræthed',
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
            9 => [
                'title' => 'GRAVID MED<br>MULTIPEL<br>SCLEROSE',
                'subcategories' => [
                    1 => 'NÅR DU PLANLÆGGER <br>GRAVIDITET'
                ]
            ],
        ];
        
        $this->setSlides();
    }
    
    private function setSlides () {
        foreach ($this->categories as $id => $category) {
            foreach ($category['subcategories'] as $key => $subcategory) {
                $this->slides[] = [
                    'category' => $id,
                    'subcategory' => $key,
                    'title' => $subcategory
                ];
            }
        }
        
        $this->moveElement($this->slides, 44, 29);

    }
    
    private function moveElement(&$array, $a, $b) {
        $out = array_splice($array, $a, 1);
        array_splice($array, $b, 0, $out);
    }

}
