export function calculateRelativeDifference(date) {
  const now = new Date();
  const difference = now.getTime() - date.getTime();

  // Convert the difference in milliseconds to a relative format
  const seconds = Math.floor(difference / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);

  if (days > 0) {
      return days + " day(s) ago";
  } else if (hours > 0) {
      return hours + " hour(s) ago";
  } else if (minutes > 0) {
      return minutes + " minute(s) ago";
  } else {
      return "less than a minute ago";
  }
}