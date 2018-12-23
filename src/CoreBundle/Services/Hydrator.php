<?php
// Cette Classe est un Trait qui sera injecté dans les entités  dans le but de les hydrater
namespace CoreBundle\Services;

trait Hydrator
{
    // ATTR + CONSTR -------------------------------------------------------------------------------------------
    // ---------------------------------------------------------------------------------------------------------
    // METHODS -------------------------------------------------------------------------------------------------
    public function hydrateEntity(array $donnees) {
        foreach($donnees as $key => $value) 
        {
			$method = 'set' . ucfirst($key);
			if (is_callable([$entity, $method])) {
				$this->$method($value);
			}
        }
    }// ---------------------------------------------------------------------------------------------------------
}