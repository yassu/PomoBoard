class User extends CI_Model
{
    private $_user_id;
    private $_user_hashed_pass;
    private $_created_date;
    private $_updated_date;

    public function __construct($user_id, $hased_pass, $created_date, $updated_date)
    {
        parent::__construct();

        $this->_user_id = $user_id;
        $this->_user_hashed_pass = $user_hashed_pass;
        $this->_created_date = isset($created_date)? $created_date: new DateTime()
        $this->_updated_date = isset($updated_date)? $updated_date: new DateTime()
    }
}