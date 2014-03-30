class PastaRepo implements PastaRepoInterface {

   public function cookSpaguetti()
   {
      return Pasta::where(‘type’, ‘=’, ‘spaguetti’)->get();
   }

   public function cookRigatoni()
   {
      return Pasta::where(‘type’, ‘=’, ‘rigatoni’)->get();
   }

// Etc. Etc...

}