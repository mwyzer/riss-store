import React, { useState, useEffect } from "react";
import {
  Box,
  Button,
  TextField,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
  Paper,
  Pagination,
  Typography,
} from "@mui/material";
import { Link } from "@inertiajs/react";

const LocationIndex = ({ locations }) => {
  const [search, setSearch] = useState("");
  const [filteredLocations, setFilteredLocations] = useState(locations.data);
  const [currentPage, setCurrentPage] = useState(locations.current_page);
  const [totalPages, setTotalPages] = useState(locations.last_page);

  // Handle search input
  const handleSearchChange = (e) => {
    setSearch(e.target.value);

    // Optionally, filter data locally if required
    const filtered = locations.data.filter((location) =>
      location.name.toLowerCase().includes(e.target.value.toLowerCase())
    );
    setFilteredLocations(filtered);
  };

  // Handle pagination change
  const handlePageChange = async (event, value) => {
    setCurrentPage(value);

    // Fetch data for the selected page
    const response = await fetch(`/account/locations?page=${value}`);
    const data = await response.json();
    setFilteredLocations(data.data);
    setTotalPages(data.last_page);
  };

  return (
    <Box sx={{ padding: 3 }}>
      <Typography variant="h4" mb={2}>
        Locations
      </Typography>

      <Box
        sx={{
          display: "flex",
          justifyContent: "space-between",
          alignItems: "center",
          marginBottom: 2,
        }}
      >
        {/* Search Bar */}
        <TextField
          label="Search Locations"
          variant="outlined"
          value={search}
          onChange={handleSearchChange}
          size="small"
          sx={{ width: "300px" }}
        />

        {/* Add Location Button */}
        <Link href="/account/locations/create" style={{ textDecoration: "none" }}>
          <Button variant="contained" color="primary">
            Add Location
          </Button>
        </Link>
      </Box>

      {/* Locations Table */}
      <TableContainer component={Paper}>
        <Table>
          <TableHead>
            <TableRow>
              <TableCell>#</TableCell>
              <TableCell>Name</TableCell>
              <TableCell>Address</TableCell>
              <TableCell>Balance</TableCell>
              <TableCell>Actions</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            {filteredLocations.map((location, index) => (
              <TableRow key={location.id}>
                <TableCell>{index + 1 + (currentPage - 1) * locations.per_page}</TableCell>
                <TableCell>{location.name}</TableCell>
                <TableCell>{location.address}</TableCell>
                <TableCell>
                  Rp {parseFloat(location.balance).toLocaleString("id-ID")}
                </TableCell>
                <TableCell>
                  <Link
                    href={`/account/locations/${location.id}/edit`}
                    style={{ textDecoration: "none", marginRight: "10px" }}
                  >
                    <Button variant="outlined" color="primary" size="small">
                      Edit
                    </Button>
                  </Link>
                  <Button
                    variant="outlined"
                    color="error"
                    size="small"
                    onClick={() => {
                      if (confirm("Are you sure you want to delete this location?")) {
                        fetch(`/account/locations/${location.id}`, {
                          method: "DELETE",
                          headers: {
                            "X-CSRF-TOKEN": document
                              .querySelector('meta[name="csrf-token"]')
                              .getAttribute("content"),
                          },
                        }).then(() => window.location.reload());
                      }
                    }}
                  >
                    Delete
                  </Button>
                </TableCell>
              </TableRow>
            ))}
          </TableBody>
        </Table>
      </TableContainer>

      {/* Pagination */}
      <Box sx={{ display: "flex", justifyContent: "center", marginTop: 2 }}>
        <Pagination
          count={totalPages}
          page={currentPage}
          onChange={handlePageChange}
          color="primary"
        />
      </Box>
    </Box>
  );
};

export default LocationIndex;
