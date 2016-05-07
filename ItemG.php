<?php

namespace ItemG;



 use pocketmine\event\player\PlayerInteractEvent;
 use pocketmine\event\Listener;
 use pocketmine\utils\Config;
 use pocketmine\utils\TextFormat;
 use pocketmine\item\Item;
 use pocketmine\Player;
 use pocketmine\Server;
 use pocketmine\plugin\PluginBase;

 
 class ItemG extends PluginBase implements Listener{



  public function onEnable(){

 
     $this->getServer()->getPluginManager()->registerEvents($this,$this);
 
     $this->getServer()->getLogger()->info(TextFormat::GREEN."ItemGを読み込みました");
     $this->getServer()->getLogger()->info(TextFormat::GREEN."ItemGは二次配布OKです  [by soradore] ");

  
     if(!file_exists($this->getDataFolder())){
           mkdir($this->getDataFolder(), 0744, true);
     }

     $this->config = new Config($this->getDataFolder() ."config.yml", Config::YAML,
     array(
           "触るブロックID1" => 19,
           "触るブロックID2" => 129,
           "触るブロックID3" => 87,
           "値段1" => 500,
           "値段2" => 1000,
           "値段3" => 500
           ));

     if($this->getServer()->getPluginManager()->getPlugin("EconomyAPI") !=null){

          $this->EconomyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
          $this->getLogger()->info(TextFormat::GREEN."EconomyAPIを検出しました");

      }else{

          $this->getLogger()->warning("EconomyAPIが見つかりませんでした");

          $this->getServer()->getPluginManager()->disable($this);

     }

  }


   public function onTouch(PlayerInteractEvent $ev){

         $player = $ev->getPlayer(); //player obj

         $username = $player->getName(); //タッチしたPlayerName

         $bitem = $ev->getItem()->getID(); //タッチしたItemID

        /* ツールガチャ品揃え*/

         $item1 = Item::get(256,0,1); //鉄ショベル
         $item2 = Item::get(257,0,1); //鉄ピッケル
         $item3 = Item::get(258,0,1); //鉄斧
         $item4 = Item::get(269,0,1); //木ショベル
         $item5 = Item::get(270,0,1); //木ピッケル
         $item6 = Item::get(271,0,1); //木斧
         $item7 = Item::get(273,0,1); // 石ショベル
         $item8 = Item::get(274,0,1); //石ピッケル
         $item9 = Item::get(275,0,1); //石斧
         $item10 = Item::get(277,0,1);//ダイヤショベル
         $item11 = Item::get(278,0,1); //ダイヤピッケル 
         $item12 = Item::get(279,0,1); //ダイヤ斧
         $item13 = Item::get(284,0,1); //金ショベル
         $item14 = Item::get(285,0,1); //
         $item15 = Item::get(286,0,1); //
         $item16 = Item::get(290,0,1); //
         $item17 = Item::get(291,0,1); //
         $item18 = Item::get(292,0,1); //
         $item19 = Item::get(293,0,1); //
         $item20 = Item::get(294,0,1); //
         $item21 = Item::get(50,0,5); //


          /* 鉱石ガチャの品揃え */

         $item23 = Item::get(263,0,3); //
         $item24 = Item::get(264,0,1); //
         $item25 = Item::get(265,0,1); //
         $item26 = Item::get(266,0,1); //
         $item27 = Item::get(388,0,1); //
         $item28 = Item::get(331,0,1); //
         $item29 = Item::get(21,0,1); //
         


         /* nether ガチャの品ぞろえ */  

         $item30 = Item::get(87,0,1); //
         $item31 = Item::get(89,0,1); //
         $item32 = Item::get(88,0,1); //
         $item33 = Item::get(112,0,1); //
         $item34 = Item::get(153,0,1); //
         $item35 = Item::get(113,0,1); //


         $nowmoney = $this->EconomyAPI->myMoney($player);


         if($bitem == ($this->config->get("触るブロックID1"))){
  
                $rand = rand(1,21);


                $nedan = $this->config->get("値段1");

                if($nowmoney < $nedan){

                $player->sendMessage("§e[ItemG] お金が足りません");

                }else{
  
                       
                       $amoney = $nowmoney - $nedan;

                       $this->EconomyAPI->setMoney($player, $amoney);


                        switch($rand){


                               case 1:
                                      $player->getInventory()->addItem($item1);
                                      $player->sendMessage("§b[ItemG] 鉄のショベル(シャベル? スコップ?)があたりました！");
                                      break;
     
                               case 2:
                                      $player->getInventory()->addItem($item2);
                                      $player->sendMessage("§b[ItemG] 鉄のピッケルがあたりました！");
                                      break;
 
                               case 3:
                                      $player->getInventory()->addItem($item3);
                                      $player->sendMessage("§b[ItemG] 鉄の斧があたりました！");
                                      break;

                               case 4:
                                      $player->getInventory()->addItem($item4);
                                      $player->sendMessage("§b[ItemG] 木のショベル(ry ");
                                      break;

                               case 5:
                                      $player->getInventory()->addItem($item5);
                                      $player->sendMessage("§b[ItemG] 木のピッケルがあたりました！");
                                      break;

                               case 6:
                                      $player->getInventory()->addItem($item6);
                                      $player->sendMessage("§b[ItemG] 木の斧があたりました！");
                                      break;

                               case 7:
                                      $player->getInventory()->addItem($item7);
                                      $player->sendMessage("§b[ItemG] 石のショベルが当たりました！!");
                                      break;
 
                               case 8:
                                      $player->getInventory()->addItem($item8);
                                      $player->sendMessage("§b[ItemG] 石のピッケルがあたりました！");
                                      break;

                               case 9:
                                      $player->getInventory()->addItem($item9);
                                      $player->sendMessage("§b[ItemG] 石の斧があたりました！");
                                      break;
 
                               case 10:
                                       $player->getInventory()->addItem($item10);
                                       $player->sendMessage("§b[ItemG] ダイヤのショベルがあたりました！");
                                       break;
                                     
                               case 11:
                                       $player->getInventory()->addItem($item11);
                                       $player->sendMessage("§b[ItemG] ダイヤのピッケルがあたりました！");
                                       break;

                               case 12:
                                       $player->getInventory()->addItem($item12);
                                       $player->sendMessage("§b[ItemG] ダイヤの斧があたりました！");
                                       break;

                               case 13:
                                       $player->getInventory()->addItem($item13);
                                       $player->sendMessage("§b[ItemG] 金のショベルがあたりました！");
                                       break;

                               case 14:
                                       $player->getInventory()->addItem($item14);
                                       $player->sendMessage("§b[ItemG] 金のピッケルがあたりました！");
                                       break;

                               case 15:
                                       $player->getInventory()->addItem($item15);
                                       $player->sendMessage("§b[ItemG] 金の斧があたりました！");
                                       break;

                               case 16:
                                       $player->getInventory()->addItem($item16);
                                       $player->sendMessage("§b[ItemG] 木のクワがあたりました！");
                                       break;

                               case 17:
                                       $player->getInventory()->addItem($item17);
                                       $player->sendMessage("§b[ItemG] 石のクワがあたりました！");
                                       break;

                               case 18:
                                       $player->getInventory()->addItem($item18);
                                       $player->sendMessage("§b[ItemG] 鉄のクワがあたりました！");
                                       break;

                               case 19:
                                       $player->getInventory()->addItem($item19);
                                       $player->sendMessage("§b[ItemG] ダイヤのクワがあたりました！");
                                       break;

                               case 20:
                                       $player->getInventory()->addItem($item20);
                                       $player->sendMessage("§b[ItemG] 金のショベルがあたりました！");
                                       break;     

                               case 21:
                                       $player->getInventory()->addItem($item21);
                                       $player->sendMessage("§b[ItemG] 松明があたりました！");    
                                       break;

                    }

            }

       }

                if($bitem == $this->config->get("触るブロックID2")){   

                         $rand = rand(1,9);

                         $nedan = $this->config->get("値段2");    

                        

                         if($nowmoney < $nedan){

                                $player->sendMessage("§e[ItemG] お金が足りません"); 

                         }else{

                               $amoney = $nowmoney - $nedan;

                               $this->EconomyAPI->setMoney($player, $amoney);

                               switch($rand){

                                             case 1:
                                                    $player->getInventory()->addItem($item24);
                                                    $player->sendMessage("§a[ItemG] ダイヤモンドがあたりました!!!!!!!!");
                                                    $this->getServer()->broadcastMessage("§b[ItemG] ".$username."さんがダイヤモンドを当てました!");

                                                   break;

                                             case 2:
                                                    $player->getInventory()->addItem($item25);
                                                    $player->sendMessage("§b[ItemG] 鉄を当てました!");
                                                    break;

                                             case 3:
                                                    $player->getInventory()->addItem($item26);
                                                    $player->sendMessage("§b[ItemG] 金をあてました");
                                                    break;
 
                                             case 4:
                                                    $player->getInventory()->addItem($item27);
                                                    $player->sendMessage("§b[ItemG] エメラルドをあてました");
                                                    break;

                                             case 5:
                                                    $player->getInventory()->addItem($item28);
                                                    $player->sendMessage("§b[ItemG] レッドストーンがあたりました！");
                                                    break;
       
                                             case 6:
                                                    $player->getInventory()->addItem($item29);
                                                    $player->sendMessage("§b[ItemG] ラピスラズリがあたりました！");
                                                    break;

                                             default:

                                                      $player->getInventory()->addItem($item23);
                                                      $player->sendMessage("§b[ItemG] 石炭があたりました！");
                      

                             }
 
                  }
             }


                        
                       if($bitem == $this->config->get("触るブロックID3")){  

                    
                                 $rand = rand(1,6);

                                 $nedan = $this->config->get("値段3");    

                        

                                 if($nowmoney < $nedan){

                                       $player->sendMessage("§e[ItemG] お金が足りません"); 

                                  }else{

                                   $amoney = $nowmoney - $nedan;

                                   $this->EconomyAPI->setMoney($player, $amoney);
 


                                   switch($rand){

                                                 case 1:
                                                        $player->getInventory()->addItem($item30);
                                                        $player->sendMessage("§b[ItemG] ネザーラックがあたりました！");
                                                        break;

                                                 case 2:
                                                        $player->getInventory()->addItem($item31);
                                                        $player->sendMessage("§b[ItemG] グロウストーンがあたりました！");
                                                        break;

                                                 case 3:
                                                        $player->getInventory()->addItem($item32);
                                                        $player->sendMessage("§b[ItemG] ソウルサンドがあたりました！");
                                                        break;

                                                 case 4:
                                                        $player->getInventory()->addItem($item33);
                                                        $player->sendMessage("§b[ItemG] ネザーレンガがあたりました！");
                                                        break;

                                                 case 5:
                                                        $player->getInventory()->addItem($item34);
                                                        $player->sendMessage("§b[ItemG] ネザークォーツがあたりました！");
                                                        break;

                                                 case 6:
                                                        $player->getInventory()->addItem($item35);
                                                        $player->sendMessage("§b[ItemG] 暗黒フェンスが当たりました!");
                                                        break;

                               }
           
                     }
            
            }

   }
  

}
