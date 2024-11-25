const Button = ({ label, onClick, className }) => (
    <button onClick={onClick} className={`btn ${className}`}>
      {label}
    </button>
  );
  
  export default Button;