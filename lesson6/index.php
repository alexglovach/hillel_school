<?php

require_once("EmployeeInterface.php");
require_once("ManagerInterface.php");
require_once("Worker.php");
require_once("Manager.php");

$managers = [
    'manager1' => new Manager('Manager 1', 3000, '2010-05-15'),
    'manager2' => new Manager('Manager 2', 3000, '2017-06-30')
];

$worker1 = new Worker('Worker 1', 1500, '2010-06-01');
$worker2 = new Worker('Worker 2', 1500, '2011-04-01');
$worker3 = new Worker('Worker 3', 1500, '2012-02-01');
$worker4 = new Worker('Worker 4', 1000, '2018-05-01');
$worker5 = new Worker('Worker 5', 1000, '2019-03-01');
$worker6 = new Worker('Worker 6', 1000, '2020-01-01');

$managers['manager1']->addEmployee($worker1);
$managers['manager1']->addEmployee($worker2);
$managers['manager1']->addEmployee($worker3);
$managers['manager2']->addEmployee($worker4);
$managers['manager2']->addEmployee($worker5);
$managers['manager2']->addEmployee($worker6);

$data = [];
foreach ($managers as $manager) {
    $data[] = [
        "name" => $manager->getName(),
        "salary" => $manager->getSalary(),
        "employeesCount" => $manager->getCountEmployees()
    ];
}

switch ($_GET["type"]) {
    case NULL:
    case "html":
        header('Content-Type: text/html; charset=UTF-8');
        echo htmlOutput($data);
        break;
    case "json":
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    case "xml":
        header('Content-type: text/xml');
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        arrayToXml($data, "manager", $xml);
        print $xml->asXML();
        break;
    default:
        echo "Error: Wrong content type!";
}



function htmlOutput($data)
{
    $html = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Homework 6 - Workers & managers</title>
            </head>
            <body>
                <table style='border-collapse: collapse;border-color:#333'>
                        <tr>
                            <td>Name</td>
                            <td>Salary</td>
                            <td>Employees Count</td>
                        </tr>
    ";
    foreach ($data as $row) {
        $html .= "<tr>";
        foreach ($row as $cell) {
            $html .= "<td>" . $cell . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "
               </table>
            </body>
        </html>
        ";
    return $html;
}

function arrayToXml($data, $keyName, &$xml)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                $key = $keyName . $key;
            }
            $subnode = $xml->addChild($key);
            arrayToXml($value, $keyName, $subnode);
        } else {
            $xml->addChild("$key", htmlspecialchars("$value"));
        }
    }
}