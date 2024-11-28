<?php

namespace App\Repositories;

use App\Models\SateliteProvider;

class SateliteProviderRepository
{
    public function getAll($filters = [])
    {
        $query = SateliteProvider::query();

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['provider'])) {
            $query->where('provider', 'like', "%{$filters['provider']}%");
        }

        if (!empty($filters['search'])) {
            $query->where('number', 'like', "%{$filters['search']}%")
                  ->orWhereHas('location', function ($q) use ($filters) {
                      $q->where('name', 'like', "%{$filters['search']}%");
                  });
        }

        return $query->paginate(10);
    }

    public function create(array $data)
    {
        return SateliteProvider::create($data);
    }

    public function update($id, array $data)
    {
        $sateliteProvider = SateliteProvider::findOrFail($id);
        $sateliteProvider->update($data);
        return $sateliteProvider;
    }

    public function delete($id)
    {
        $sateliteProvider = SateliteProvider::findOrFail($id);
        $sateliteProvider->delete();
        return true;
    }
}
