<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** 
 * The model of a foreign term
 *
 */
class Term extends Model {

    /*
     * One to many relationship to find the user who add this terms
     *
     */
    public function author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    /*
     * One to many to find all the translation of this term
     *
     */
    public function translations() {
        return $this->hasMany('App\Models\Translation', 'term_id');
    }

    /*
     * One to many to find all the translations of this
     * model's definition.
     *
     */
    public function def_translations() {
        return $this->hasMany('App\Models\Definition', 'term_id');
    }
}
