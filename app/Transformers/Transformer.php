<?php

namespace App\Transformers;

abstract class Transformer  {
  /**
   * [transformCollection description]
   * @param  array $items
   * @return         
   */
  public function transformCollection($items){

    return array_map([$this, 'transform'], $items);
  }

  public abstract function transform($item);

}
