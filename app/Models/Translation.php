<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** 
 * The model of an Haitian Creole translation of a foreign term
 *
 */
class Translation extends Model {

    /*
     * Link to the term which this is a translation
     *
     */
    public function term() {
        return $this->belongsTo('App\Models\Term', 'term_id');
    }

    /*
     * Link to whom added this translation
     *
     */
    public function author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function voters() {
        return $this->belongsToMany('App\Models\User', 'votes', 'trans_id', 'user_id');
    }

}
