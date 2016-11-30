<?php

class NavGenerator {

    public $navigation;
    public $base_url;
    private $data;

	/**
	 * NavGenerator constructor.
	 *
	 * @param mixed $data Array or object containing the data to construct the menu
	 */
    public function __construct($data) {
        $this->data = $data;
    }

	/**
	 * run
	 *
	 * Sets the url to create links from and executes the script, generating a multi-level menu
	 *
	 * @param string $base_url
	 *
	 * @return mixed
	 */
    public function run($base_url = __DIR__){
	    $this->base_url = $base_url;
        if (is_array($this->data[0])) {
            $menu = $this->formatArray($this->data);
        } elseif (is_object($this->data[0])) {
            $menu = $this->formatObject($this->data);
        }
        $this->generateNav($menu);
        return $this->navigation;
    }

	/**
	 * formatArray
	 *
	 * Formats the array for use in the generateNav method
	 *
	 * @param array $data   Array containing data to construct the menu
	 * @param int   $parent_id  id used to arrange the links
	 *
	 * @return array|null
	 */
    private function formatArray($data, $parent_id = 0){
        $links = null;
        foreach($data as $menu_entry){
            if ($menu_entry['parent_id'] == $parent_id) {
                $array = [
                'title' => $menu_entry['title'],
                'url' => $menu_entry['url'],
                'submenu' => null,
                ];
                $array['submenu'] = $this->formatArray($data, $menu_entry['id']);
                $links[] = $array;
            }
        }
        return $links;
    }

	/**
	 * formatObject
	 *
	 * Formats the Object for use in the generateNav method
	 *
	 * @param object $data       Object containing data to construct the menu
	 * @param int    $parent_id  id used to arrange the links
	 *
	 * @return array|null
	 */
    private function formatObject($data, $parent_id = 0){
        $links = null;
        foreach($data as $menu_entry){
            if ($menu_entry->parent_id == $parent_id) {
                $array = [
                'title' => $menu_entry->title,
                'url' => $menu_entry->url,
                'submenu' => null,
                ];
                $array['submenu'] = $this->formatObject($data, $menu_entry->id);
                $links[] = $array;
            }
        }
        return $links;
    }

	/**
	 * generateNav
	 *
	 * Constructs the multi-level menu and wrapping it in html before returning it
	 *
	 * @param $menu
	 *
	 * @return string Return the finished menu as a HTML unordered list
	 */
    private function generateNav($menu) {
        $list = '<ul>';
        foreach ($menu as $menu_entry) {
            $list .= '<li><a href="' . $this->base_url . '/' . $menu_entry['url'] . '">' . $menu_entry['title'] . '</a></li>';
            if (is_array($menu_entry['submenu'])) {
                $list .= $this->generateNav($menu_entry['submenu']);
            }
        }
        $list .= '</ul>';
        return $this->navigation = $list;
    }
}