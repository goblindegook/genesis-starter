import notify from 'gulp-notify';

export default function(error) {
  notify.onError({
    title: 'Compile Error',
    message: "<%= error %>"
  }).apply(this, arguments);

  return this.emit('end');
};
