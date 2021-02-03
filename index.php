<?php
include_once 'shop.php';
$shop = new Shop;
$productList = $shop->getShopProductList();
$product1 = $productList->addProduct('Продукт 1', 10);
$product2 = $productList->addProduct('Продукт 2', 12);
$courierList =  $shop->getShopCourierList();
$courierList->addCourier('Вася', 'Петров','+79151112343','aaa@bbb.to', 'Москва', 1, 0);
$courierList->addCourier('Петя', 'Васильев','+7913243243','bbb@bbb.to', 'Москва', 0, 1);
$customerList =  $shop->getShopCustomerList();
$customerList->addCustomer('Игорь', 'Петров','+79151112343','aaa@bbb.to', 'Москва', 0);
$customerList->addCustomer('Иван', 'Васильев','+7913243243','bbb@bbb.to', 'Москва', 1);
$basketList = $shop->getShopBasketList();
$customer =  $customerList->getCustomer(0);
$customerBasket=$basketList->getCustomerBasket($customer);
$customerBasket->addProduct($product1,10);
$customerBasket->addProduct($product1,10);
$customerBasket->addProduct($product2,5);
echo "Осталось в первом продукте: ".$product1->getQuantity().'</br>';
echo "Осталось во втором продукте: ".$product2->getQuantity().'</br>';
echo 'Сейчас в корзине:</br>';
var_dump($customerBasket);
echo '</br>';
$order=$shop->checkout($customerBasket);
echo 'Сейчас в заказе:</br>';
var_dump($order);
echo '</br>';
echo 'Сейчас в корзине все товары удалены:</br>';
var_dump($customerBasket);
//создаём ручками
echo '</br>';
echo 'Создаём доставку для заказа:</br>';
$deliveryList = $shop->getShopDeliveryList();
$delivery = $deliveryList->addDelivery($order, $courierList->getCourierList());
$delivery->setCourier();
echo "-Курьер".var_dump($delivery->getCourier());
?>