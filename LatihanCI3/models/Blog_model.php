<?php
// Model bertugas berinteraksi dengan database

class Blog_model extends CI_Model
{
    public function getBlogs()
    {
        return $this->db->get("blog");
    }

    public function getSingleBlog($url)
    {
        return $this->db->get_where('blog', array('url' => $url));
    }
}
