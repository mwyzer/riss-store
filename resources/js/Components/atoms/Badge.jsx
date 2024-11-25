const Badge = ({ text, type }) => {
    const badgeClasses = {
      BD: "bg-blue-500",
      DC: "bg-purple-500",
      VC: "bg-pink-500",
    };
    return <span className={`badge ${badgeClasses[type]}`}>{text}</span>;
  };
  
  export default Badge;