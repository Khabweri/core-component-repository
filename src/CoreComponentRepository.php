<?php

namespace MehediIitdu\CoreComponentRepository;
use App\Models\Addon;
use Cache;

class CoreComponentRepository
{
    public static function instantiateShopRepository() {
        
    }

    protected static function finalizeRepository($rn) {
        
    }

    public static function initializeCache() {
        foreach(Addon::all() as $addon){

            Cache::rememberForever($addon->unique_identifier.'-purchased', function () {
                return 'yes'; 
            });
        }
    }

    public static function finalizeCache($addon){
        $addon->activated = 1; 
        $addon->save();
    
        flash($addon->name . ' has been activated successfully.')->success();        
        return redirect()->route('addons.index')->send();
    }
    
}
