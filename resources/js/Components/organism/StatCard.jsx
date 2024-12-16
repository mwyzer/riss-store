export function StatCard({ title, todayAmount, monthAmount, accent, extraInfo }) {
    const formatCurrency = (amount) => {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      }).format(amount).replace('IDR', 'Rp')
    }
  
    const getBackgroundColor = () => {
      switch (accent) {
        case 'green': return 'bg-green-600'
        case 'red': return 'bg-red-600'
        case 'blue': return 'bg-blue-600'
        case 'yellow': return 'bg-yellow-600'
        case 'purple': return 'bg-purple-600'
        case 'teal': return 'bg-teal-600'
        case 'violet': return 'bg-violet-600'
        default: return 'bg-gray-600'
      }
    }
  
    return (
      <div className={`${getBackgroundColor()} rounded-lg p-4 text-white`}>
        <div className="flex items-center gap-2 mb-2">
          {title}
        </div>
        <div className="space-y-1">
          <div className="flex justify-between items-center">
            <span className="text-sm text-white/80">Hari Ini</span>
            <div className="flex items-center gap-2">
              <span className="font-medium">{formatCurrency(todayAmount)}</span>
              {extraInfo?.today && (
                <span className="text-sm text-white/80">/ {extraInfo.today}</span>
              )}
            </div>
          </div>
          <div className="flex justify-between items-center">
            <span className="text-sm text-white/80">Bulan Ini</span>
            <div className="flex items-center gap-2">
              <span className="font-medium">{formatCurrency(monthAmount)}</span>
              {extraInfo?.month && (
                <span className="text-sm text-white/80">/ {extraInfo.month}</span>
              )}
            </div>
          </div>
        </div>
      </div>
    )
  }
  
  