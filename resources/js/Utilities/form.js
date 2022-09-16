const inputClasses = (error) =>
    error
        ? 'focus:ring-red-800 focus:border-red-700 border-red-700'
        : 'focus:ring-primary-500 focus:border-primary-500 border-gray-300'

export { inputClasses }
