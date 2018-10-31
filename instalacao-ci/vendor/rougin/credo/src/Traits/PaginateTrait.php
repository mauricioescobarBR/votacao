<?php

namespace Rougin\Credo\Traits;

/**
 * Paginate Trait
 *
 * @package Credo
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 *
 * @property \CI_Config     $config
 * @property \CI_Input      $input
 * @property \CI_Loader     $load
 * @property \CI_Pagination $pagination
 * @property \CI_URI        $uri
 *
 * @method integer countAll()
 * @method array   get($limit = null, $page = null, array $order = null)
 */
trait PaginateTrait
{
    /**
     * Limits the data based on given configuration and generates pagination links.
     *
     * @param  integer $page
     * @param  array   $config
     * @return array
     */
    public function paginate($page, $config = array())
    {
        $this->load->library('pagination');

        $config = $this->configuration($config);

        $config['per_page'] = (integer) $page;

        $config['total_rows'] = $this->countAll();

        $offset = $this->offset($page, $config);

        $this->pagination->initialize($config);

        $result = array($this->get($page, $offset));

        $result[] = $this->pagination->create_links();

        return (array) $result;
    }

    /**
     * Returns the offset from the defined configuration.
     *
     * @param  array $config
     * @return integer
     */
    protected function offset($page, array $config)
    {
        $offset = $this->uri->segment($config['uri_segment']);

        if ($config['page_query_string'] === true) {
            $segment = $config['query_string_segment'];

            $offset = $this->input->get($segment);
        }

        $numbers = $config['use_page_numbers'] && $offset !== 0;

        return $numbers ? ($page * $offset) - $page : $offset;
    }

    /**
     * Retrieves configuration from pagination.php.
     * If not available, will based on given and default data.
     *
     * @param  array $config
     * @return array
     */
    protected function configuration(array $config)
    {
        $this->load->helper('url');

        $items = array('base_url' => current_url());

        $items['page_query_string'] = false;
        $items['query_string_segment'] = 'per_page';
        $items['uri_segment'] = 3;
        $items['use_page_numbers'] = false;

        foreach ((array) $items as $key => $value) {
            if ($this->config->item($key) !== null) {
                $config[$key] = $this->config->item($key);
            } elseif (! isset($config[$key])) {
                $config[$key] = $value;
            }
        }

        return $config;
    }
}
