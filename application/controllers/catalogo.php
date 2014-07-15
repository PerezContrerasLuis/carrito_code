<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Catalogo extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('catalogo_model');
    }
    
    function index()
    {
        $data['title'] = 'Catálogo codeIgniter';
        $pages = 6; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . 'catalogo/pagina/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->catalogo_model->filas();
        $config['per_page'] = $pages;
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div id="paginacion">';
        $config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        
        $data["productos"] = $this->catalogo_model->total_productos_paginados($config['per_page'], $this->uri->segment(3));
        
        $this->load->view('catalogo_view', $data);
    }
  
    function agregarProducto()
    {
        $id = $this->input->post('id');
        $producto = $this->catalogo_model->porId($id);
        $cantidad = 1;
        //obtenemos el contenido del carrito
        $carrito = $this->cart->contents();
 
        foreach ($carrito as $item) {
            //si el id del producto es igual que uno que ya tengamos
            //en la cesta le sumamos uno a la cantidad
            if ($item['id'] == $id) {
                $cantidad = 1 + $item['qty'];
            }
        }
        //cogemos los productos en un array para insertarlos en el carrito
        $insert = array(
            'id' => $id,
            'qty' => $cantidad,
            'price' => $producto->precio,
            'name' => $producto->nombre
        );
        //si hay opciones creamos un array con las opciones y lo metemos
        //en el carrito
        if ($producto->opcion) {
            $insert['options'] = array(
            $producto->opcion => $producto->opciones[$this->input->post($producto->opcion)]
            );
        }
        //insertamos al carrito
        $this->cart->insert($insert);
        //cogemos la url para redirigir a la página en la que estabamos
        $uri = $this->input->post('uri');
        //redirigimos mostrando un mensaje con las sesiones flashdata
        //de codeigniter confirmando que hemos agregado el producto
        $this->session->set_flashdata('agregado', 'El producto fue agregado correctamente');
        redirect('../catalogo/pagina/'.$uri, 'refresh');
    }
    
    function eliminarProducto($rowid) 
    {
        //para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $producto = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($producto);
        
        $this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
        redirect('../catalogo', 'refresh');
    }
    
    function eliminarCarrito() {
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
        redirect('../catalogo', 'refresh');
    }
}
/*application/controllers/catalogo.php
 * el controlador
 */