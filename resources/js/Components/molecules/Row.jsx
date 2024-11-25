import Badge from "../atoms/Badge";
import Text from "../atoms/Text";
import Icon from "../atoms/Icon";

const Row = ({ time, customer, jenis, jumlah, profit }) => (
  <tr className="row-data">
    <td>
      <Text>{time}</Text>
    </td>
    <td>
      <Text>{customer}</Text>
    </td>
    <td>
      <Badge text={jenis} type={jenis} />
    </td>
    <td>
      <Text>{jumlah}</Text>
    </td>
    <td className="text-success">
      <Text>{profit}</Text>
    </td>
    <td>
      <Icon className="fa fa-eye text-white" />
    </td>
  </tr>
);

export default Row;
