<?php
namespace app\components;
 
use yii\base\Component;

class Settings extends Component {

    public $categories;
    
    public function init() {        
        $this->categories = [
            1 => [
                'title' => 'Hvad er Multipel Sclerose',
                'subcategories' => [
                    1 => 'Multipel Sclerose Er en nervesygdom',
                    2 => 'Nedbrydning af myelin & nerveceller',
                    3 => 'Hvordan får man en autoimmun sygdom',
                    4 => 'Langsom hjernebetændelse',
                    5 => 'Hvad er plak',
                    6 => 'Genkend et attak'
                ]
            ]
        ];
    }
}
