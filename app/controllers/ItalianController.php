<?php
//app/controllers/ItalianController.php

class ItalianController extends KitchenController {

   protected $pastaRepo;
   protected $meatRepo;
   protected $sauceRepo;

   public function __construct(PastaRepoInterface $pasta, MeatRepoInterface $meat, SauceRepoInterface $sauce)
   {
      $this->pastaRepo  = $pasta; 
      $this->meatRepo   = $meat;
      $this->sauceRepo = $sauce;
   }

   public function pastaWithMeatballs($idTable, $type = 'long')
   {
      // Si el usuario pidió pasta larga cocinaremos espaguetis 
      if ($type == 'long')
      {
         $pasta = $this->pastaRepo->cookSpaghetti();
      }
      // Si el usuario pidió pasta corta cocinaremos rigatonis
      else if ($type == 'short')
      {
         $pasta = $this->pastaRepo->cookRigatoni();
      }
      else
      {
         return Redirect::route('table', array($idTable)->with('message', 'Por favor elija pasta corta o pasta larga');
      }

      $meatBalls = $this->meatRepo->cookMeatBalls();
      $napoliSauce = $this->sauceRepo->cookNapoliSauce();

      $food = compact('pasta', 'meatBalls', 'napoliSauce');
   
      return View::make('dishes/italian', $food);
   }
}