<?php


class Worker
{
    private $name;

    private $age;

    private $salary;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        if ($this->checkAge($age)) {
            $this->age = $age;
        }
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    private function checkAge($age)
    {
        if ($age >= 1 && $age <= 100) {
            return true;
        }
        return false;
    }

}

//set objects
$obj1 = new Worker();
$obj1->setName('Ivan');
$obj1->setAge(25);
$obj1->setSalary(1000);

$obj2 = new Worker();
$obj2->setName('Vasya');
$obj2->setAge(26);
$obj2->setSalary(2000);

// salary summ
var_dump($obj1->getSalary() + $obj2->getSalary());

// age summ
var_dump($obj1->getAge() + $obj2->getAge());


//Name and age function
function workerData($obj)
{
    var_dump($obj->getName());
    var_dump($obj->getAge());
}

workerData($obj1);
workerData($obj2);