<?php
  class Word {
    public $pos_id;
    public $cspan_id;
    public $rspan_id;
    public $right;
    public $word;
    public $line_id;
    public $top;
    public $height;
    public $width;
    public $left;
    public $page_id;
    public $word_id;

    public function __construct($word) {
      $this->pos_id   = $word->pos_id;
      $this->cspan_id = $word->cspan_id;
      $this->rspan_id = $word->rspan_id;
      $this->right    = $word->right;
      $this->word     = $word->word;
      $this->line_id  = $word->line_id;
      $this->top      = $word->top;
      $this->height   = $word->height;
      $this->width    = $word->width;
      $this->left     = $word->left;
      $this->page_id  = $word->page_id;
      $this->word_id  = $word->word_id;
    }
  }
