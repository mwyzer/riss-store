import Header from "../molecules/Header";
import Row from "../molecules/Row";

const Table = ({ data }) => (
  <table className="table table-dark">
    <Header />
    <tbody>
      {data.map((row, idx) => (
        <Row key={idx} {...row} />
      ))}
    </tbody>
  </table>
);

export default Table;
