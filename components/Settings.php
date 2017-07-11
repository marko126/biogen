<?php
namespace app\components;
 
use yii\base\Component;

class Settings extends Component {

    public $categories;
    
    public function init() {        
        $this->categories = [
            1 => [
                'title' => 'Hvad er<br> Multipel<br> Sclerose',
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
                'title' => 'årsager til<br> Multipel<br> Sclerose',
                'subcategories' => [
                    1 => 'årsagen til sclerose er ukendt',
                    2 => 'risiko hos<br> slægtninge',
                    3 => 'ikke ét<br> ms gen',
                    4 => 'kendte <br>miljøfaktorer'
                ]
            ],
        ];
    }
}
