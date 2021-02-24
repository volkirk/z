<?php
    interface iBirthday{
        public function increaceAge();
    }
    class Family implements iBirthday{
        public $surname;
        public $location;
        public function __construct(string $surname, string $location){
            $this->surname = $surname;
            $this->location = $location;
        }
        private $peopleCount = 0;
        public function newMember(){
            $this->peopleCount++;
        }
        public function getPeopleCount(){
            return $this->peopleCount;
        }
        public function increaceAge(){
            $this->age++;
        }
    }
    class Father extends Family{
       public $name;
       public $age;
       public $wife;
       public $eyesColor;
       public $hairsColor;
        public function __construct(string $name, int $age, string $wife, Family $family, string $eyesColor, string $hairsColor){
            $this->name = $name;
            $this->surname = $family->surname;
            $this->age = $age;
            $this->wife = $wife;
            $family->newMember();
            $this->eyesColor = $eyesColor;
            $this->hairsColor = $hairsColor;
        }
    }
    class Mother extends Family{
        public $name;
        public $age;
        public $husband;
        public $eyesColor;
        public $hairsColor;
         public function __construct(string $name, int $age, string $husband, Family $family, string $eyesColor, string $hairsColor){
             $this->name = $name;
             $this->surname = $family->surname . 'a';
             $this->age = $age;
             $this->husband = $husband;
             $family->newMember();
             $this->eyesColor = $eyesColor;
             $this->hairsColor = $hairsColor;
         }
    }
    class Child extends Family{
        public $name;
        public $age;
        public $sex;
        public $father;
        public $mother;
        public $eyesColor;
        public $hairsColor;
         public function __construct(string $name, int $age, string $sex, Father $father, Mother $mother, Family $family){
             $this->name = $name;
             $this->age = $age;
             $this->sex = $sex;
             $this->father = $father->name . $father->surname;
             $this->mother = $mother->name . $mother->surname;
             $this->eyesColor = $mother->eyesColor;
             $this->hairsColor = $father->hairsColor;
             $family->newMember();
             if ($this->sex == 'Female'){
                $this->surname = $family->surname . 'a';
             }else{
                $this->surname = $family->surname;
             }
         }
    }
    // ТЕСТИРОВАНИЕ
    $family = new Family('Логинов', 'Москва');
    $father = new Father('Олег', 25, 'Елена', $family, 'Зеленые', 'Черные');
    $mother = new Mother('Елена', 23, 'Олег', $family, 'Голубые', 'Белые');
    $son = new Child('Михаил', 7, 'Male', $father, $mother, $family);
    $daughter = new Child('Анастасия', 5, 'Female', $father, $mother, $family);
    echo 'Количество человек в семье: ' . $family->getPeopleCount();
    echo '<br><br>Отец:';
    echo '<br>Имя: ' . $father->surname . ' ' . $father->name;
    echo '<br>Возраст: ' . $father->age;
    echo '<br>Жена: ' . $father->wife;
    echo '<br>Цвет глаз: ' . $father->eyesColor;
    echo '<br>Цвет волос: ' . $father->hairsColor;
    echo '<br><br>Мать:';
    echo '<br>Имя: ' . $mother->surname . ' ' . $mother->name;
    echo '<br>Возраст: ' . $mother->age;
    echo '<br>Муж: ' . $mother->husband;
    echo '<br>Цвет глаз: ' . $mother->eyesColor;
    echo '<br>Цвет волос: ' . $mother->hairsColor;
    echo '<br><br>Сын:';
    echo '<br>Имя: ' . $son->surname . ' ' . $son->name;
    echo '<br>Возраст: ' . $son->age;
    echo '<br>Пол: ' . $son->sex;
    echo '<br>Цвет глаз: ' . $son->eyesColor;
    echo '<br>Цвет волос: ' . $son->hairsColor;
    $daughter->increaceAge();
    echo '<br><br>Дочь:';
    echo '<br>Имя: ' . $daughter->surname . ' ' . $daughter->name;
    echo '<br>Возраст: ' . $daughter->age;
    echo '<br>Пол: ' . $daughter->sex;
    echo '<br>Цвет глаз: ' . $daughter->eyesColor;
    echo '<br>Цвет волос: ' . $daughter->hairsColor;
?>