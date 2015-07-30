<?php 

class FileMenu {

  public $page;
  public $file;

  public function __construct(FileModel $file) {
    $this->page = $file->page();
    $this->file = $file;
  }

  public function item($icon, $label, $attr = array()) {

    $a = new Brick('a', '', $attr);
    $a->append(icon($icon, 'left'));
    $a->append(l($label));
    $a->data('modal-return-to', $this->page->url());

    $li = new Brick('li');
    $li->append($a);

    return $li;

  }

  public function previewOption() {  
    return $this->item('play-circle-o', 'files.show.open', array(
      'href'   => $this->file->previewUrl(),
      'target' => '_blank'
    ));
  }

  public function editOption() {
    return $this->item('pencil', 'files.index.edit', array(
      'href' => $this->file->url(),
    ));
  }

  public function deleteOption() {
    return $this->item('trash-o', 'files.show.delete', array(
      'href'       => $this->file->url('delete'),
      'data-modal' => true,
    ));
  }

  public function html() {

    $list = new Brick('ul');
    $list->addClass('nav nav-list');
    $list->addClass('dropdown-list');

    $list->append($this->previewOption());
    $list->append($this->editOption());
    $list->append($this->deleteOption());

    return '<nav class="dropdown dropdown-dark contextmenu">' . $list . '</nav>';

  }

  public function __toString() {
    return (string)$this->html();
  }

}