<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <title>character creation</title>
</head>
<body>
  <?php
     class Character {
        public $name;
        public $charClass;
        public $constitution;
        public static $hitPoints = 10;
        public $images;
  
        private static function getDiceRoll($n) {
          $arr = array();
          for ($i = 0; $i < $n; $i++) {
            $arr[] = rand(1,6);
          }
          return array_sum($arr);
        }
    
        private $_dndClasses;
        

        function get_name() {
          $this->name = $_POST["name"];
          return $this->name;
        }

        function get_charClass() {
          $this->_dndClasses = array("Dark Elf", "Druid", "Human", "Elf", "Halfling", "Half-Orc", "Dragonborn" );
          $this->charClass = $this->_dndClasses[rand(0,6)];
          return $this->charClass;
        }

        function get_images() {
          $this->images = glob("images/*.*");
          return $this->images;
        }

        function get_constitution() {
          $this->constitution = floor(($this->getDiceRoll(4) - 10) / 2);
          return $this->constitution;
        }

      
     }

     
     $char = new Character();
     $charName = $char->get_name();
     $charClass = $char->get_charClass();
     $classImages = $char->get_images();
     $constitution = $char->get_constitution();
     $hitPoints = Character::$hitPoints + $constitution;
     
     echo "<h2>Hey there, <span>".$charName."</span>!</h2>";
     echo "<h2>You rolled the <span>".$charClass."</span> class.</h2>";

     // switch statement is OK for small amount of use cases
     switch ($charClass) {
       case "Dark Elf":
        echo '<img src="'.$classImages[0].'" alt="your DnD class" />';
       break;
       case "Druid":
        echo '<img src="'.$classImages[3].'" alt="your DnD class" />';
       break;
       case "Human":
        echo '<img src="'.$classImages[7].'" alt="your DnD class" />';
       break;
       case "Elf":
        echo '<img src="'.$classImages[4].'" alt="your DnD class" />';
       break;
       case "Halfling":
        echo '<img src="'.$classImages[6].'" alt="your DnD class" />';
       break;
       case "Half-Orc":
        echo '<img src="'.$classImages[5].'" alt="your DnD class" />';
       break;
       case "Dragonborn":
        echo '<img src="'.$classImages[2].'" alt="your DnD class" />';
       break;
     }
     
     echo "<h2>Your constitution modifier is <span>".$constitution."</span>.</h2>";
     echo "<h2>You have <span>".$hitPoints."</span> starting hit points.</h2>";
     ?>
  

    <form method="POST" action="index.php">
  <button type="submit">Name change?</button>
    </form>
    
   
</body>
</html>