import dayjs from 'dayjs';
import 'dayjs/locale/en';
import utc from 'dayjs/plugin/utc';
import timezone from 'dayjs/plugin/timezone';
import AdvancedFormat from 'dayjs/plugin/advancedFormat';
import relativeTime from 'dayjs/plugin/relativeTime';
import LocalizedFormat from 'dayjs/plugin/localizedFormat';
import localeData from 'dayjs/plugin/localeData';
import minMax from 'dayjs/plugin/minMax';

dayjs.locale('en');
dayjs.extend(AdvancedFormat);
dayjs.extend(relativeTime);
dayjs.extend(LocalizedFormat);
dayjs.extend(localeData);
dayjs.extend(timezone);
dayjs.extend(utc);
dayjs.extend(minMax);
dayjs.tz.setDefault('Africa/Kampala');

export default dayjs;
