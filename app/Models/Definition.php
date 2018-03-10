<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** 
 * The model of the translation of a term's definition
 *
 */
class Definition extends Model {

    /*
     * Link to the term which this tranlates the definition
     *
     */
    public function term() {
        return $this->belongsTo('App\Models\Term', 'term_id');
    }

    /*
     * Link to whom posted this translation
     *
     */
    public function author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

}
